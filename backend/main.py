from fastapi import FastAPI
from fastapi.middleware.cors import CORSMiddleware
from esquemas import SolicitudPrecio, RespuestaPrecio
import os
from dotenv import load_dotenv

load_dotenv()

app = FastAPI(title="Motor de Precios Ecomoda")

origins = os.getenv("CORS_ORIGINS", "http://127.0.0.1:8000").split(",")

app.add_middleware(
    CORSMiddleware,
    allow_origins=origins,
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

@app.post("/v1/precios/calcular", response_model=RespuestaPrecio)
async def calcular_precios(solicitud: SolicitudPrecio):
    subtotal = sum(item.base_price * item.quantity for item in solicitud.items)
    
    tax_rate = float(os.getenv("IVA_RATE", 0.19))
    tax = subtotal * tax_rate
    
    base_shipping = float(os.getenv("SHIPPING_BASE", 15.0))
    per_item_shipping = float(os.getenv("SHIPPING_PER_ITEM", 2.0))
    total_items = sum(item.quantity for item in solicitud.items)
    
    shipping = base_shipping + (total_items * per_item_shipping)
    if solicitud.shipping_type == "express":
        shipping *= 1.5
        
    total = subtotal + tax + shipping
    
    return RespuestaPrecio(
        subtotal=round(subtotal, 2),
        tax=round(tax, 2),
        shipping=round(shipping, 2),
        total=round(total, 2)
    )
