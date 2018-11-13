import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ReactiveFormsModule } from '@angular/forms';

import { ProductosRoutingModule } from './productos-routing.module';
import { ProductosComponent } from './productos.component';
import { CreateComponent } from './create/create.component';

@NgModule({
  imports: [
    CommonModule,
    ProductosRoutingModule,
    ReactiveFormsModule
  ],
  declarations: [ProductosComponent, CreateComponent]
})
export class ProductosModule { }
