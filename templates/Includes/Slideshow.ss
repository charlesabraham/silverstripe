				



<div class="col-md-12 column">

<% with $SiteConfig %>

<% if $SlideTime > 0 %>
  <div class="carousel slide" data-ride="carousel" data-interval="$SlideTime" id="carousel-main">
<% else %>
  <div class="carousel slide" data-ride="carousel" data-interval="3000" id="carousel-main">
<% end_if %>

<% end_with %>

    <ol class="carousel-indicators">

<% loop $Showslides() %>
	
	<% if First %>
      	<li class="active" data-slide-to="$Pos" data-target="#carousel-main"></li>
	<% else %>
      	<li data-slide-to="$Pos" data-target="#carousel-main"></li>
	<% end_if %>
<% end_loop %>
    </ol>

		<div class="carousel-inner">

<% loop $Showslides() %>

    		<% if First %>
            	<div class="item active">
    		<% else %>
     		<div class="item">
		<% end_if %>		 

			  <img class="home-img-slideshow" title="$Slides.Title" alt="$Slides.Title" src="$PrimaryPhoto.URL" />
				
			  <div class="carousel-caption">
          <h4>$Title</h4>
          <p>
            $Description
          </p>
			  </div>
		  </div>

<% end_loop %>

		</div>
    <a class="left carousel-control" href="#carousel-main" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
    <a class="right carousel-control" href="#carousel-main" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
	</div>
</div>
