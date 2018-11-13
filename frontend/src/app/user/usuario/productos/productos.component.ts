import { Component, OnInit } from '@angular/core';

import { ProductosService } from 'src/app/services/productos.service';
import { Producto } from 'src/app/models/producto';
import { Categoria } from 'src/app/models/categoria';
import { Usuario } from 'src/app/models/usuario';

@Component({
  selector: 'app-productos',
  templateUrl: './productos.component.html',
  styleUrls: ['./productos.component.scss']
})
export class ProductosComponent implements OnInit {

  private productos: Array<Producto> = [];

  constructor(
    private productosService: ProductosService
  ) { }

  ngOnInit() {
  
    this.getProductos();
  }//end ngOnInit

  getProductos(): void{

    this.productosService.getProductos().subscribe(
      productos => this.productos= productos
    );
  }
}//end ProductosComponent
