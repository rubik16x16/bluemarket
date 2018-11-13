import { Component, OnInit } from '@angular/core';
import { FormGroup, FormControl } from '@angular/forms';

import { ProductosService } from 'src/app/services/productos.service';
import { CategoriasService } from 'src/app/services/categorias.service';
import { Categoria } from 'src/app/models/categoria';
import { Producto } from 'src/app/models/producto';
import { Usuario } from 'src/app/models/usuario';

@Component({
  selector: 'app-create',
  templateUrl: './create.component.html',
  styleUrls: ['./create.component.scss']
})
export class CreateComponent implements OnInit {

  private imgsToUpload : Array<File>= [];
  private imgsUrl: Array<string>= [];
  private categorias: Array<Categoria>;
  
  private producto= new FormGroup({
    nombre: new FormControl(),
    precio: new FormControl(),
    existencia: new FormControl(),
    descripcion: new FormControl(),
    categoria: new FormControl()
  });

  constructor(
    private productosService: ProductosService,
    private categoriasService: CategoriasService
  ) { }
  
  ngOnInit() {

    this.getCategorias();
  }

  private getCategorias(): void{

    this.categoriasService.getCategorias().subscribe(
      categorias => this.categorias= categorias
    );
  }

  private enviar(): void{

    let productoData= this.producto.value;
    let usuario= new Usuario('usuario1@gmail.com', true, 1);

    let producto= new Producto(productoData.nombre, productoData.precio,
      productoData.precio, true, productoData.descripcion, this.categorias[productoData.categoria],
      usuario, [], this.imgsToUpload);

    console.log(producto);
  }

  private addImg(): void{

    let input= document.getElementById('img-loader');
    input.click();
  }

  private onSelectFile(event) { // called each time file input changes

    console.log(this.imgsToUpload);

    if (event.target.files && event.target.files[0]) {

      this.imgsToUpload.push(event.target.files[0]);

      var reader = new FileReader();
      reader.readAsDataURL(event.target.files[0]); // read file as data url
      reader.onload = (event) => { // called once readAsDataURL is completed
        this.imgsUrl.push(event.target.result);
      }//end closure
    }//end if
  }//end onSelectFile
}//end CreateComponent
