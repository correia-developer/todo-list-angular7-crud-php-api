import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';

@Component({
  selector: 'app-add',
  templateUrl: './add.component.html',
  styleUrls: ['./add.component.css']
})
export class AddComponent implements OnInit {

  addTodo: FormGroup;
  constructor(private formBuilder: FormBuilder) { }


  ngOnInit() {
    this.addTodo = this.formBuilder.group({
      todo: ['', [Validators.required]]
    });
  }


  onSave() {
    console.log(this.addTodo.value);
  }

}
