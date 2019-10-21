const pics = {
  burger: 'https://tse4.mm.bing.net/th?id=OIP.oZWcYShHLrCV22JjyufrXAHaE8&pid=Api&P=0&w=254&h=170',
  fries: 'http://jesspryles.com/wp-content/uploads/2015/06/houston-13-e1433189861383.jpg',
  hotdog: 'https://madhungry.wordpress.com/files/2009/08/five-guys-hot-dog.jpg',
  shake: 'https://cdn.newsday.com/polopoly_fs/1.12407268.1475673590!/httpImage/image.jpg_gen/derivatives/display_960/image.jpg'
};
var src = pics.burger;
let img = <img src={pics.burger} onClick={handleClick}/>;
function handleClick(e) {
	if (src === pics.burger) {
		e.target.setAttribute('src', pics.fries);
  e.target.setAttribute('alt', 'fries');
		src = pics.fries;
	} else if (src === pics.fries){
  		e.target.setAttribute('src', pics.hotdog);
  e.target.setAttribute('alt', 'hotdog');
  		src = pics.hotdog;
	} else if (src === pics.hotdog) {
	e.target.setAttribute('src', pics.shake);
  e.target.setAttribute('alt', 'shake');
		src = pics.shake;
	} else if (src === pics.shake) {
	e.target.setAttribute('src', pics.burger);
  e.target.setAttribute('alt', 'burger');
		src = pics.burger;
	}
}

ReactDOM.render(
	<div>
		<p>{img}</p>
		<p>Click The Image!</p>
	</div>,
  document.getElementById('burger')
);

