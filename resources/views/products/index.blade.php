@extends("layouts.default")
@section("title", "Tous les articles")
@section("content")

	<h1>Tous les articles</h1>

	<p>
		<!-- Lien pour créer un nouvel article : "products.create" -->
		<a href="{{ route('products.create') }}" title="Créer un article" >Créer un nouveau produit</a>
	</p>

	<!-- Le tableau pour lister les articles/products -->
	<table border="1" >
		<thead>
			<tr>
				<th>Nom</th>
				<th colspan="2" >Operations</th>
			</tr>
		</thead>
		<tbody>
			<!-- On parcourt la collection de product -->
			@foreach ($products as $product)
			<tr>
				<td>
					<!-- Lien pour afficher un product : "products.show" -->
					<a href="{{ route('products.show', $product) }}" title="Lire l'article" >{{ $product->name }}</a>
				</td>
				<td>
					<!-- Lien pour modifier un product : "products.edit" -->
					<a href="{{ route('products.edit', $product) }}" title="Modifier l'article" >Modifier</a>
				</td>
				<td>
					<!-- Formulaire pour supprimer un product : "products.destroy" -->
					<form method="POST" action="{{ route('products.destroy', $product) }}" >
						<!-- CSRF token -->
						@csrf
						<!-- <input type="hidden" name="_method" value="DELETE"> -->
						@method("DELETE")
						<input type="submit" value="x Supprimer" >
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	
@endsection