from pydantic import BaseModel
from typing import List

class CartItem(BaseModel):
    id: int
    base_price: float
    quantity: int
    category: str

class PricingRequest(BaseModel):
    items: List[CartItem]
    shipping_type: str

class PricingResponse(BaseModel):
    subtotal: float
    tax: float
    shipping: float
    total: float
