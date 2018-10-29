import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

const APP_ROUTES: Routes= [
  { path: '', loadChildren: './user/user.module#UserModule' },
  { path: 'admin', loadChildren: './admin/admin.module#AdminModule' }
];

@NgModule({

  imports: [
    RouterModule.forRoot(APP_ROUTES, {enableTracing: true})
  ],
  exports: [
    RouterModule
  ]
})

export class AppRoutingModule{ }