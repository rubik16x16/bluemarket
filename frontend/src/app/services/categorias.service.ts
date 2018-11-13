import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { MessageService } from './message.service';
import { Observable, of } from 'rxjs';
import { catchError, map, tap } from 'rxjs/operators';

import { Categoria } from '../models/categoria';

@Injectable({
  providedIn: 'root'
})
export class CategoriasService{

  private readonly Categorias_URL='http://localhost/bluemarket/public/api/categorias';
  private readonly HTTP_OPTIONS= {
    headers: new HttpHeaders({ 'Content-Type': 'application/json' })
  };

  constructor(
    private http: HttpClient,
    private messageService: MessageService
  ) { }

  getCategorias(): Observable<any>{

    return this.http.get<any>(this.Categorias_URL)
      .pipe(
        map(
          res => {
  
            return res.map(item => {return new Categoria(item.id, item.nombre)});
          }
        ),
        tap(_ => this.log('fetched Categorias')),
        catchError(this.handleError('getCategorias', []))
      );
  }

  getCategoria(id: number): Observable<any>{

    return this.http.get<any>(`${this.Categorias_URL}/${id}`)
    .pipe(
      tap(_ => this.log(`fetched Categoria id:${id}`)),
      catchError(this.handleError('getCategoria', []))
    )
  }//end getCategoria

  storeCategoria(Categoria: Categoria): Observable<any>{

    let CategoriaData: FormData= new FormData();
    // CategoriaData.append('titulo', Categoria.getTitulo());
    // CategoriaData.append('cuerpo', Categoria.getCuerpo());
    // CategoriaData.append('img', Categoria.getImgFile());

    return this.http.post<any>(this.Categorias_URL, CategoriaData)
      .pipe(
        tap(Categoria => this.log(`stored Categoria id:${Categoria.id}`)),
        catchError(this.handleError('storeCategoria', []))
      );
  }//end storeCategoria

  updateCategoria(id: number, Categoria: Categoria): Observable<any>{

    let CategoriaData: FormData= new FormData();
    CategoriaData.append('_method', 'PUT');
    // CategoriaData.append('titulo', Categoria.getTitulo());
    // CategoriaData.append('cuerpo', Categoria.getCuerpo());
    // CategoriaData.append('img', Categoria.getImgFile());

    return this.http.post(`${this.Categorias_URL}/${id}`, CategoriaData).
      pipe(
        tap(_ => this.log(`updated Categoria id:${id}`)),
        catchError(this.handleError('updateCategoria', []))
      );
  }//end updateCategoria

  deleteCategoria(Categoria: Categoria | number): Observable<any>{

    const id = typeof Categoria === 'number' ? Categoria : Categoria.getId();

    return this.http.delete(`${this.Categorias_URL}/${id}`, this.HTTP_OPTIONS).
      pipe(
        tap(_=> this.log(`deleted Categoria id:${id}`)),
        catchError(this.handleError('deletedCategoria', []))
      );
  }//end deleteCategoria

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

    this.messageService.add(`CategoriasService: ${message}`);
  }//end log
}//end CategoriasService

