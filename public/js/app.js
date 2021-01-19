const btns = document.querySelectorAll('.prod-link');
//

btns.forEach(buybtn => buybtn.addEventListener('click',  (e)=> {
	const id = e.target.dataset.id
	addToBasket(id)
}))

// function addToBasket(id) {
// 	$.ajax({
// 		url: "index.php?path=order/add/"+id+'&asAjax=true',
// 		method: 'post',
// 		data: {itemId:id}
// 	}).done(function(data){ // Успешное получение ответа
// 		JSON.parse(data).forEach(d => {
// 			console.log(d)
// 		})
// 		// $(".cart-show").html(data);
// 		console.log(JSON.parse(data))
// 	});
// }
//index.php?path=order/add/{{ good.id }}&asAjax=true


function addToBasket(id) {
	return fetch('index.php?path=order/add/'+id+'&asAjax=true', {
		method: 'POST',
		// body:{itemId: id},
		headers: {'Content-Type': 'application/x-www-form-urlencoded, charset=utf-8'}
	})
		.then(response => {
			if (response.ok) {
				return response.json()
			}
		})
		.then(data => {
			// for (let dataKey in data) {
			// 	console.log(dataKey)
			// }
			console.log(data)
		})
		.catch(()=> console.log('ошибка!'))
}