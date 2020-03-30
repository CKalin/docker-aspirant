updateReviewsTable = function(table) {
  const http = new XMLHttpRequest();
  http.open("GET", 'http://localhost:9980/api/reviews.json');
  http.send();
  http.onreadystatechange = (e) => {
    if (http.readyState == 4 && http.status == 200) {
      const response = JSON.parse(http.responseText);
      updateTableWithReviews(response.response.data.shop.reviews, table);
    }
  }
}

updateTableWithReviews = function(reviews, table) {
  const tbody = table;
  tbody.innerHTML = '';
  reviews.forEach(r => {
    const row = tbody.insertRow();
    row.insertCell().innerHTML = r.markDescription;
    row.insertCell().innerHTML = r.comment;
    row.insertCell().innerHTML = new Date(r.creationDate).toLocaleString();
  });
}

toggleTableBackground = function(table) {
  table.classList.toggle('reverse');
}

byId = function(id) {
  return document.getElementById(id);
}
