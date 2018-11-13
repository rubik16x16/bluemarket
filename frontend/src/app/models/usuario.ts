export class Usuario{

  constructor(
    private email: string,
    private estado: boolean,
    private id: number= null
  ){ }

  getId(): number{

    return this.id
  }//end getId

  setId(id: number): void{

    this.id= id;
  }//end setId

  getEmail(): string{

    return this.email;
  }//end getEmail

  setEmail(email: string): void{

    this.email= email;
  }//end setEmail

  getEstado(): boolean{

    return this.estado;
  }//end getEstado

  setEstado(estado: boolean): void{

    this.estado= estado;
  }//end setEstado
}//end Usuario class