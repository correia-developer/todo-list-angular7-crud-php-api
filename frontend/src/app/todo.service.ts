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


  // Create todo
  createTodo(todo: Todo) {
    return this.http.post('http://localhost/todo-list-angular7-crud-php-api/backend/create.php', todo);
  }
  
  // Delete todo
  deleteTodo(id: number) {
    return this.http.delete<Todo>('http://localhost/todo-list-angular7-crud-php-api/backend/delete.php?id=' + id);
  }

}
