import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

import { Todo } from './todo';

@Injectable({
  providedIn: 'root'
})
export class TodoService {

  constructor(private http: HttpClient) { }

  // Get todos
  getTodos() {
    return this.http.get<Todo[]>('http://localhost/todo-list-angular7-crud-php-api/backend/read.php');
  }


  
}
