@extends('layouts.app')

@section('content')
    <livewire:companies.edit-component :title="$title" :detail="$detail"/>
@endsection

@section('extraJs')
    <script type="text/javascript">
        $(document).ready(function() {
            $('body').on('click', '.tray-search-go', function () {
                var var1 = $(this);
                var var2 = $('.ui-tray').find('.tray-list-result');
                $(var2).addClass('d-none');
            });
            $('body').on('click', '.in-tray-search-result .card.user-choice', function () {

                var var1 = $(this);
                var var3 = $('.select-cart-area.users');
                var full_name = $(var1).data('full_name');
                var role = $(var1).data('role');
                var image = $(var1).data('image');
                var var99 = `
					<div class="card mb-10 select-cart-item users">
						<i data-feather="x" class="close-btn"></i>
						<div class="card-body">
							<label>
								<img class="thumb" src="${image}">
								${full_name} (${role})
							</label>
							<input type="text" class="form-control gmod" placeholder="Role in company (required)">
						</div>
					</div>
				`;
                var3.append(var99);
                feather.replace();
            });

            $('body').on('click', '.in-tray-search-result .card.ship-choice', function () {
                var var1 = $(this);
                var var3 = $('.select-cart-area.ships');
                var name = $(var1).data('name');
                var category = $(var1).data('category');
                category = category[0].toUpperCase() + category.slice(1);;

                var var99 = `
					<div class="card mb-10 select-cart-item">
						<i data-feather="x" class="close-btn"></i>
						<div class="card-body">
							<label>
								${name} (${category})
							</label>
						</div>
					</div>
				`;

                var3.append(var99);
                feather.replace();
            });

            $('body').on('click', '.in-tray-search-result .card.boat-choice', function () {
                var var1 = $(this);
                var var3 = $('.select-cart-area.boats');
                var name = $(var1).data('name');

                var var99 = `
					<div class="card mb-10 select-cart-item">
						<i data-feather="x" class="close-btn"></i>
						<div class="card-body">
							<label>
								${name} (Tug Boat)
							</label>
						</div>
					</div>
				`;
                var3.append(var99);
                feather.replace();
            });
            $('body').on('click', '.remove-el', function () {
                $(this).parent().remove();
            });
        });
    </script>
@endsection
