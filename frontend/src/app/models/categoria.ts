export class Categoria{

  constructor(
    private nombre:string,
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
}//end Categoria