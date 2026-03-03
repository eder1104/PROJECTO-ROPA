from fastapi import FastAPI
from fastapi.middleware.cors import CORSMiddleware
from schemas import PricingRequest, PricingResponse
import os
from dotenv import load_dotenv

load_dotenv()

app = FastAPI(title="Ecomoda Pricing Engine")

origins = os.getenv("CORS_ORIGINS", "http://127.0.0.1:8000").split(",")

app.add_middleware(
    CORSMiddleware,
    allow_origins=origins,
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

@app.post("/v1/pricing/calculate", response_model=PricingResponse)
async def calculate_pricing(request: PricingRequest):
    subtotal = sum(item.base_price * item.quantity for item in request.items)
    
    tax_rate = float(os.getenv("IVA_RATE", 0.19))
    tax = subtotal * tax_rate
    
    base_shipping = float(os.getenv("SHIPPING_BASE", 15.0))
    per_item_shipping = float(os.getenv("SHIPPING_PER_ITEM", 2.0))
    total_items = sum(item.quantity for item in request.items)
    
    shipping = base_shipping + (total_items * per_item_shipping)
    if request.shipping_type == "express":
        shipping *= 1.5
        
    total = subtotal + tax + shipping
    
    return PricingResponse(
        subtotal=round(subtotal, 2),
        tax=round(tax, 2),
        shipping=round(shipping, 2),
        total=round(total, 2)
    )
