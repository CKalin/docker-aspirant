import { Component, Input } from '@angular/core';
import { Review } from "./review.model";

@Component({
  selector: 'review-table',
  templateUrl: './review-table.component.html',
  styleUrls: ['./review-table.component.scss']
})
export class ReviewTableComponent {

  public reviews: Array<Review>;

  @Input("reviews")
  public set setReviews(reviews: Array<Review>) {
    if (reviews) {
      this.reviews = [...reviews]
        .sort(this.sortByMarkDesc)
    } else {
      this.reviews = reviews;
    }
  }

  private sortByMarkDesc(a: Review, b: Review) {
    return b.mark - a.mark;
  }
}
