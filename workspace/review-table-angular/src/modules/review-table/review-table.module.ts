import { NgModule } from '@angular/core';
import { CommonModule } from "@angular/common";
import { HttpClientModule } from "@angular/common/http";

import { ReviewTableComponent } from './review-table.component';
import { ReviewRepository } from './review.repository';

@NgModule({
  declarations: [
    ReviewTableComponent
  ],
  imports: [
    CommonModule,
    HttpClientModule
  ],
  exports: [
    ReviewTableComponent
  ],
  providers: [
    ReviewRepository
  ]
})
export class ReviewTableModule { }
