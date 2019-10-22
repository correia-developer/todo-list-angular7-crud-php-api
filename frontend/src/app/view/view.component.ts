import { Component, OnInit } from '@angular/core';

import { TodoService } from '../todo.service';
import { Todo } from './../todo';

@Component({
  selector: 'app-view',
  templateUrl: './view.component.html',
  styleUrls: ['./view.component.css']
})
export class ViewComponent implements OnInit {

  todos: Todo[];
  id: any;

  constructor(private todoService: TodoService) { }

  ngOnInit() {

    this.todoService.getTodos()
    .subscribe((data: Todo[]) => {
      this.todos = data;
    });
  
  }

  // Delete
  delete(todo: Todo): void {
    //console.log(todo.id);
    this.todoService.deleteTodo(todo.id).subscribe(data => {
      this.todos = this.todos.filter(u => u !== todo)
    });
  }

}
