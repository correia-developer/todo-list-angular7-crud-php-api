import { ViewComponent } from './view/view.component';
import { AddComponent } from './add/add.component';
import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

const routes: Routes = [
  { path: '', component: AddComponent, pathMatch: 'full' },
  { path: 'add', component: AddComponent },
  { path: 'view', component: ViewComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
