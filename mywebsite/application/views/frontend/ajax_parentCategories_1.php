<?php
    $this->load->model('m_parent_categories');
    $data = $this->m_parent_categories->select_and_pagination(13,0);
 ?>
 <?php foreach ($data as $data): ?>
     <li class="tab selected" data-tab-id="<?php echo strtolower ($data['Name_Parent_Categories']) ?>">
         <a href="/c/sf/restaurants">
             <i class="i ig-best_of_yelp i-restaurants-best_of_yelp BOY-icon"></i>
             <span class="category-title"><?php echo $data['Name_Parent_Categories'] ?></span>
                 <span class="review-count">11,380 reviewed</span>
         </a>
     </li>
 <?php endforeach ?>




<li class="tab" data-tab-id="food">
    <a href="/c/sf/food">
        <i class="i ig-best_of_yelp i-food-best_of_yelp BOY-icon"></i>
        <span class="category-title">Food</span>
            <span class="review-count">7,854 reviewed</span>
    </a>
</li>


<li class="tab" data-tab-id="nightlife">
    <a href="/c/sf/nightlife">
        <i class="i ig-best_of_yelp i-nightlife-best_of_yelp BOY-icon"></i>
        <span class="category-title">Nightlife</span>
            <span class="review-count">2,623 reviewed</span>
    </a>
</li>


<li class="tab" data-tab-id="shopping">
    <a href="/c/sf/shopping">
        <i class="i ig-best_of_yelp i-shopping-best_of_yelp BOY-icon"></i>
        <span class="category-title">Shopping</span>
            <span class="review-count">11,926 reviewed</span>
    </a>
</li>


<li class="tab" data-tab-id="bars">
    <a href="/c/sf/bars">
        <i class="i ig-best_of_yelp i-nightlife-best_of_yelp BOY-icon"></i>
        <span class="category-title">Bars</span>
            <span class="review-count">1,581 reviewed</span>
    </a>
</li>


<li class="tab" data-tab-id="newamerican">
    <a href="/c/sf/newamerican">
        <i class="i ig-best_of_yelp i-restaurants-best_of_yelp BOY-icon"></i>
        <span class="category-title">American (New)</span>
            <span class="review-count">822 reviewed</span>
    </a>
</li>


<li class="tab" data-tab-id="breakfast_brunch">
    <a href="/c/sf/breakfast_brunch">
        <i class="i ig-best_of_yelp i-restaurants-best_of_yelp BOY-icon"></i>
        <span class="category-title">Breakfast &amp; Brunch</span>
            <span class="review-count">511 reviewed</span>
    </a>
</li>


<li class="tab" data-tab-id="coffee">
    <a href="/c/sf/coffee">
        <i class="i ig-best_of_yelp i-coffee-best_of_yelp BOY-icon"></i>
        <span class="category-title">Coffee &amp; Tea</span>
            <span class="review-count">1,888 reviewed</span>
    </a>
</li>


<li class="tab" data-tab-id="beautysvc">
    <a href="/c/sf/beautysvc">
        <i class="i ig-best_of_yelp i-beautysvc-best_of_yelp BOY-icon"></i>
        <span class="category-title">Beauty &amp; Spas</span>
            <span class="review-count">6,452 reviewed</span>
    </a>
</li>


<li class="tab" data-tab-id="health">
    <a href="/c/sf/health">
        <i class="i ig-best_of_yelp i-health-best_of_yelp BOY-icon"></i>
        <span class="category-title">Health &amp; Medical</span>
            <span class="review-count">8,953 reviewed</span>
    </a>
</li>


<li class="tab" data-tab-id="homeservices">
    <a href="/c/sf/homeservices">
        <i class="i ig-best_of_yelp i-homeservices-best_of_yelp BOY-icon"></i>
        <span class="category-title">Home Services</span>
            <span class="review-count">8,776 reviewed</span>
    </a>
</li>


<li class="tab" data-tab-id="auto">
    <a href="/c/sf/auto">
        <i class="i ig-best_of_yelp i-auto-best_of_yelp BOY-icon"></i>
        <span class="category-title">Automotive</span>
            <span class="review-count">3,218 reviewed</span>
    </a>
</li>


<li class="tab" data-tab-id="localservices">
    <a href="/c/sf/localservices">
        <i class="i ig-best_of_yelp i-localservices-best_of_yelp BOY-icon"></i>
        <span class="category-title">Local Services</span>
            <span class="review-count">5,195 reviewed</span>
    </a>
</li>

    <li class="more no-count">
        <a href="javascript:;">
            <i class="i ig-best_of_yelp i-down_arrow-best_of_yelp BOY-icon"></i>
            <span class="category-title">More Categories</span>
        </a>
    </li>