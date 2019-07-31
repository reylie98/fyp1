@extends('layouts.cslayout.csdesign')
@section('content')
<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
<!--End-breadcrumbs-->
    <div class="col-sm-4 col-sm-offset-1">
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title bg_ly" data-toggle="collapse"><span class="icon"><i class="icon-chevron-down"></i></span>
            <h5>Return</h5>
          </div>
          <div class="widget-content nopadding collapse in" id="collapseG2">
            <ul class="recent-posts">
              <li>
                <div class="user-thumb"> <img width="40" height="40" alt="User" src="{{asset('/images/Backendimages/demo/av1.jpg')}}"> </div>
                <div class="article-post"> <span class="user-info"> Return Policy </span>
                  <p><a href="#">The product must be returned within one months withoug opening the package</a> </p>
                </div>
              </li>
              <li>
                <div class="user-thumb"> <img width="40" height="40" alt="User" src="{{asset('/images/Backendimages/demo/av2.jpg')}}"> </div>
                <div class="article-post"> <span class="user-info"> Returning charge </span>
                  <p><a href="#">If the user want to return the product, postage charge will be added upon delivery</a> </p>
                </div>
              </li>
              <li>
                <div class="user-thumb"> <img width="40" height="40" alt="User" src="{{asset('/images/Backendimages/demo/av4.jpg')}}"> </div>
                <div class="article-post"> <span class="user-info"> Returning Procedure </span>
                  <p><a href="#">The user must have any ticket that approved for returnning procedure</a> </p>
                </div>
            </ul>
          </div>
        </div>
        
      </div>
    </div>
    <div class="col-sm-4 col-sm-offset-1">
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title bg_ly" data-toggle="collapse" ><span class="icon"><i class="icon-chevron-down"></i></span>
            <h5>Refund</h5>
          </div>
          <div class="widget-content nopadding collapse in" id="collapseG2">
            <ul class="recent-posts">
              <li>
                <div class="user-thumb"> <img width="40" height="40" alt="User" src="{{asset('/images/Backendimages/demo/av1.jpg')}}"> </div>
                <div class="article-post"> <span class="user-info"> Refund time </span>
                  <p><a href="#">All the refund need at least 2x24 hours.</a> </p>
                </div>
              </li>
              <li>
                <div class="user-thumb"> <img width="40" height="40" alt="User" src="{{asset('/images/Backendimages/demo/av2.jpg')}}"> </div>
                <div class="article-post"> <span class="user-info"> Refund bank </span>
                  <p><a href="#">The refund should approved by admin and takes 1-2 days working hours</a> </p>
                </div>
              </li>
              <li>
                <div class="user-thumb"> <img width="40" height="40" alt="User" src="{{asset('/images/Backendimages/demo/av4.jpg')}}"> </div>
                <div class="article-post"> <span class="user-info"> Refund </span>
                  <p><a href="#">The users can choose the refund by bank transfer or discount coupon</a> </p>
                </div>
            </ul>
          </div>
        </div>
        
      </div>
    </div>
    <div class="col-sm-4">
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title bg_ly" data-toggle="collapse"><span class="icon"><i class="icon-chevron-down"></i></span>
            <h5>Delivery</h5>
          </div>
          <div class="widget-content nopadding collapse in" id="collapseG2">
            <ul class="recent-posts">
              <li>
                <div class="user-thumb"> <img width="40" height="40" alt="User" src="{{asset('/images/Backendimages/demo/av1.jpg')}}"> </div>
                <div class="article-post"> <span class="user-info"> Delivery Partners </span>
                  <p><a href="#">The Delivery partners including pos laju, Gedex and JNT</a> </p>
                </div>
              </li>
              <li>
                <div class="user-thumb"> <img width="40" height="40" alt="User" src="{{asset('/images/Backendimages/demo/av2.jpg')}}"> </div>
                <div class="article-post"> <span class="user-info"> Delivery Tracking number</span>
                  <p><a href="#">Since the organization using third-pary logistic, the tracking number will be given after 1 days</a> </p>
                </div>
              </li>
              <li>
                <div class="user-thumb"> <img width="40" height="40" alt="User" src="{{asset('/images/Backendimages/demo/av4.jpg')}}"> </div>
                <div class="article-post"> <span class="user-info"> Delivery tracking cannot found </span>
                  <p><a href="#">Please report the problem thorugh the ticketing systems</a> </p>
                </div>
            </ul>
          </div>
        </div>
        
      </div>
    </div>
    <div class="col-sm-4">
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title bg_ly" data-toggle="collapse"><span class="icon"><i class="icon-chevron-down"></i></span>
            <h5>Products</h5>
          </div>
          <div class="widget-content nopadding collapse in" id="collapseG2">
            <ul class="recent-posts">
              <li>
                <div class="user-thumb"> <img width="40" height="40" alt="User" src="{{asset('/images/Backendimages/demo/av1.jpg')}}"> </div>
                <div class="article-post"> <span class="user-info"> Cannot add product to cart </span>
                  <p><a href="#">This mean the product is out of stock</a> </p>
                </div>
              </li>
              <li>
                <div class="user-thumb"> <img width="40" height="40" alt="User" src="{{asset('/images/Backendimages/demo/av2.jpg')}}"> </div>
                <div class="article-post"> <span class="user-info"> Product dissapear </span>
                  <p><a href="#">This mean the product no longer in production </a> </p>
                </div>
              </li>
              <li>
                <div class="user-thumb"> <img width="40" height="40" alt="User" src="{{asset('/images/Backendimages/demo/av4.jpg')}}"> </div>
                <div class="article-post"> <span class="user-info"> Product deffect </span>
                  <p><a href="#">The product can be request for refund for cash or coupon.</a> </p>
                </div>
            </ul>
          </div>
        </div>
        
      </div>
    </div>
  </div>
</div>  


@endsection