import { Usuario } from './usuario';
import { Categoria } from './categoria';

export class Producto{

  constructor(
    private nombre: string,
    private precio: number,
    private existencia: number,
    private estado: boolean,
    private descripcion: string,
    private categoria: Categoria,
    private usuario: Usuario,
    private imgsSrc: Array<String>= [],
    private imgsFile: Array<File>= [],
    private id: number= null
  ){ }

  getId(): number{

    return this.id;
  }//end getId

  setId(id: number): void{

    this.id= id;
  }//end setId

  getNombre(): string{

    return this.nombre;
  }//end getNombre

  setNombre(nombre: string): void{

    this.nombre= nombre;
  }//end setNombre

  getPrecio(): number{

    return this.precio;
  }//end getPrecio

  setPrecio(precio: number): void{

    this.precio;
  }//end setPrecio

  getExistencia(): number{

    return this.existencia;
  }//end getExistencia

  setExistencia(existencia: number): void{

    this.existencia= existencia;
  }//end setExistencia

  getEstado(): boolean{

    return this.estado;
  }//end getEstado

  setEstado(estado: boolean): void{

    this.estado= estado;
  }//end setEstado

  getDescripcion(): string{

    return this.descripcion;
  }//end getDescripcion

  setDescripcion(descripcion: string): void{

    this.descripcion= descripcion;
  }//end setDescripcion

  getCategoria(): Categoria{

    return this.categoria;
  }//end getCategoria

  setCategoria(categoria: Categoria): void{

    this.categoria= categoria;
  }//end setCategoria

  getUsuario(): Usuario{

    return this.usuario;
  }//end getUsuario

  setUsuario(usuario: Usuario): void{

    this.usuario= usuario;
  }//end setUsuario

  getImgsSrc(): Array<String>{

    return this.imgsSrc;
  }//end getImgsSrc

  setImgsSrc(imgsSrc: Array<String>): void{

    this.imgsSrc= imgsSrc;
  }//end setImgSrc

  getImgsFile(): Array<File>{

    return this.imgsFile;
  }//end getImgsFile

  setImgsFile(imgsFile: Array<File>): void{

    this.imgsFile= imgsFile;
  }//end setImgsFile
}//end Producto class