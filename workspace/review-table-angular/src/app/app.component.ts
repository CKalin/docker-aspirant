import { Component, OnInit } from '@angular/core';
import { Review } from '../modules/review-table/review.model';
import { ReviewRepository } from '../modules/review-table/review.repository';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent implements OnInit {

  constructor(private repository: ReviewRepository) {
  }

  ngOnInit() {
    this.reloadReviews();
  }

  public reviews: Array<Review>;
  public isTableBackgroundReverse = false;

  public toggleTableBackground() {
    this.isTableBackgroundReverse = !this.isTableBackgroundReverse;
  }

  public reloadReviews() {
    this.reviews = undefined;
    this.repository.loadReviews().subscribe(r => this.reviews = r);
  }
}
