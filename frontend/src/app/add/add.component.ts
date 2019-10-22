import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { Router } from '@angular/router';

import { TodoService } from './../todo.service';

@Component({
  selector: 'app-add',
  templateUrl: './add.component.html',
  styleUrls: ['./add.component.css']
})
export class AddComponent implements OnInit {

  addTodo: FormGroup;
  constructor(private todoService: TodoService,
              private formBuilder: FormBuilder,
              private router: Router) { }


  ngOnInit() {
    this.addTodo = this.formBuilder.group({
      todo: ['', [Validators.required]]
    });
  }


  onSave() {
    //console.log(this.addTodo.value);
    this.todoService.createTodo(this.addTodo.value)
    .subscribe(data => {
      this.router.navigate(['/view']);
    });
    
  }

}
