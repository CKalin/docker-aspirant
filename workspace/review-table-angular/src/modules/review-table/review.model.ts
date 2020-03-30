export interface Response<T> {
  response: DataWithCode<T>
}

export interface DataWithCode<T> {
  code: number,
  data: T
}

export interface ShopReviewData {
  shop: ShopReview
}

export interface ShopReview {
  name: string,
  reviews: Array<Review>
}

export interface Review {
  markDescription: string,
  mark: number,
  comment: string,
  creationDate: Date
}
