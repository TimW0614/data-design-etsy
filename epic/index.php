<!doctype html>
<html>
	<head>
		<title>Data Design Etsy Project</title>
		<meta charset="utf8"/>
	</head>
	<body>,
		<h1> Persona, Use Case, Interaction Flow, and Conceptual Model </h1>
		<h2>Persona</h2>
		<h3>Name:</h3><p>Robert Lester</p>

		<h3>age:</h3>
		<p>63</p>

		<h3>profession:</h3>
		<p>Robert is a commercial painter. He has been a blue collar worker his whole life and just recently retired.</p>

		<h3>Technology</h3>
		<p>Robert aims for top of the line products often buying without understanding the capabilities of the computer.
			Operating system is windows. 4g smart phone with unlimited data. Reliable internet connection.</p>

		<h3>Attitudes and behaviors</h3>
		<p>Robert has no patience for technology, he typically asks his son for help. Always stays busy.</p>

		<h3>Goals</h3>
		<p>Robert has a goal of selling hand crafted art to a variety of people</p>

		<h3>Story</h3>
		<p>Robert,has had a hobby of making art from scratch and miscelanious things.
			Roberts family has encouraged him to sell his products to try and turn a profit.
			Robert is looking for a web platform to sell his handcrafted art.
			Robert has little experience using the web and is looking for something easy to use with clear instructions
			on posting his work.</p>

		<h2>Use Case</h2>
		<p>Robert was reffered to etsy.com by his family and has read thru the instructions on how to upload his items to sell.
			Robert is leaving for vacation in 1 hour and would like to have his products up befor he leaves.</p>

		<h2>interaction flow</h2>
		<ol>
			<li>Sellar will click link for "sell on etsy"</li>
			<li>Sellar will be rerouted to "open your etsy shop"</li>
			<li>Sellar will follow link to set up sellar profile</li>
			<li>Sellar will follow link to add products 1 by 1</li>
			<li>Sellar will include an item details adn overview</li>
			<li>Sellar will confirm and post</li>
		</ol>
		<h2>conceptual model</h2>
		<h3>entities and attributes</h3>
		<p><strong>seller</strong></p>
		<ul>
			<li>sellerId(primary key)</li>
			<li>sellerLocation</li>
			<li>sellerEmail</li>
			<li>sellerPhone</li>
			<li>sellerHash</li>
			<li>sellerSalt</li>
		</ul>

		<p><strong>item</strong></p>
		<ul>
			<li>itemName(primary key)</li>
			<li>itemId(forein key</li>
			<li>itemPrice</li>
			<li>itemDetails</li>
			<li>itemQuantity</li
		</ul>

		<h3>relations</h3>
		<p>1 - n</p> <!--one seller has many items -->


	</body>
</html>