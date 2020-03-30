import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppComponent } from './app.component';
import { ReviewTableModule } from '../modules/review-table/review-table.module';

@NgModule({
  declarations: [
    AppComponent
  ],
  imports: [
    BrowserModule,
    ReviewTableModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
