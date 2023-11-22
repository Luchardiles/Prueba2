import { Component, OnInit} from '@angular/core';
import {NgFor} from '@angular/common';

@Component({
  selector: 'app-lista-productos',
  templateUrl: './lista-productos.component.html',
  styleUrls: ['./lista-productos.component.css'],
  standalone: true,
  imports: [
    NgFor,
  ],
})
export class ListaProductosComponent implements OnInit{
  constructor() { }

  ngOnInit() {

}
}
