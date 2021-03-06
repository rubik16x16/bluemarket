import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { UserComponent } from './user.component';

const routes: Routes = [
  { 
    path: '',
    component: UserComponent,
    children: [
      {
        path: 'perfil',
        loadChildren: './usuario/usuario.module#UsuarioModule'
      }
    ]
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class UserRoutingModule { }
