<div class="main-section">

    <h1 class="main-section-title">Popular Categories</h1>

    <div class="container">
        <div class="row">
            @if($categories->count() != 0)
                @foreach ($categories as $category)
                    <div class="col-md-4 col-sm-6">
                        <div class="category">
                            <a href="#">
                                <div class="book-counter">{{count($category->books)}}</div>

                                <div class="category-name">{{$category->title}}</div>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <div class="category-more-btn">
        <a href="#">All Categories <i class="fa fa-arrow-circle-o-right"></i></a>
    </div>
</div>