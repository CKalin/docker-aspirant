import { Component, Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

import { Response, Review, ShopReviewData } from "./review.model";
import { Observable } from 'rxjs';
import { map } from 'rxjs/operators';

@Injectable()
export class ReviewRepository {

  private reviewsUrl = "http://localhost:9980/api/reviews.json";

  constructor(private http: HttpClient) {
  }

  public loadReviews(): Observable<Array<Review>> {
    return this.http.get<Response<ShopReviewData>>(this.reviewsUrl)
      .pipe(map(r => r.response.data.shop.reviews));
  }
}
