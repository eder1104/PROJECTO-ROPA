from pydantic import BaseModel
from typing import List

class ItemCarrito(BaseModel):
    id: int
    base_price: float
    quantity: int
    category: str

class SolicitudPrecio(BaseModel):
    items: List[ItemCarrito]
    shipping_type: str

class RespuestaPrecio(BaseModel):
    subtotal: float
    tax: float
    shipping: float
    total: float
