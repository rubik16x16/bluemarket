import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { MessageService } from './message.service';
import { Observable, of } from 'rxjs';
import { catchError, map, tap } from 'rxjs/operators';

import { Producto } from '../models/producto';
import { Categoria } from '../models/categoria';
import { Usuario } from '../models/usuario';

@Injectable({
  providedIn: 'root'
})
export class ProductosService{

  private readonly Productos_URL='http://localhost/bluemarket/public/api/productos';
  private readonly HTTP_OPTIONS= {
    headers: new HttpHeaders({ 'Content-Type': 'application/json' })
  };

  constructor(
    private http: HttpClient,
    private messageService: MessageService
  ) { }

  getProductos(): Observable<any>{

    return this.http.get<any>(this.Productos_URL)
      .pipe(
        map(
          res => {
            return res.map(item => {
              let categoria= new Categoria(item.categoria.nombre, item.categoria.id);
              let usuario= new Usuario('usuario1@gmail.com', true, 1);
              return new Producto(item.nombre, item.precio, item.existencia,
                item.estado, item.descripcion, categoria, usuario, item.imgs, [], item.id);
            })
          }
        ),
        tap(_ => this.log('fetched Productos')),
        catchError(this.handleError('getProductos', []))
      );
  }//end getProductos

  getProducto(id: number): Observable<any>{

    return this.http.get<any>(`${this.Productos_URL}/${id}`)
    .pipe(
      map(
        item => {
          let categoria= new Categoria(item.categoria.nombre, item.categoria.id);
          let usuario= new Usuario('usuario1@gmail.com', true, 1);
          return new Producto(item.nombre, item.precio, item.existencia,
            item.estado, item.descripcion, categoria, usuario, item.imgs, [], item.id);
        }
      ),
      tap(_ => this.log(`fetched Producto id:${id}`)),
      catchError(this.handleError('getProducto', []))
    )
  }//end getProducto

  storeProducto(Producto: Producto): Observable<any>{

    let ProductoData: FormData= new FormData();

    return this.http.post<any>(this.Productos_URL, ProductoData)
      .pipe(
        tap(Producto => this.log(`stored Producto id:${Producto.id}`)),
        catchError(this.handleError('storeProducto', []))
      );
  }//end storeProducto

  updateProducto(id: number, Producto: Producto): Observable<any>{

    let ProductoData: FormData= new FormData();
    ProductoData.append('_method', 'PUT');

    return this.http.post(`${this.Productos_URL}/${id}`, ProductoData).
      pipe(
        tap(_ => this.log(`updated Producto id:${id}`)),
        catchError(this.handleError('updateProducto', []))
      );
  }//end updateProducto

  deleteProducto(Producto: Producto | number): Observable<any>{

    const id = typeof Producto === 'number' ? Producto : Producto.getId();

    return this.http.delete(`${this.Productos_URL}/${id}`, this.HTTP_OPTIONS).
      pipe(
        tap(_=> this.log(`deleted Producto id:${id}`)),
        catchError(this.handleError('deletedProducto', []))
      );
  }//end deleteProducto

  private handleError<T> (operation = 'operation', result?: T){
    return (error: any): Observable<T> => {

      // TODO: send the error to remote logging infrastructure
      console.error(error); // log to console instead

      // TODO: better job of transforming error for user consumption
      this.log(`${operation} failed: ${error.message}`);

      // Let the app keep running by returning an empty result.
      return of(result as T);
    };
  }//end handleError

  private log(message: string): void{

    this.messageService.add(`ProductosService: ${message}`);
  }//end log
}//end ProductosService

