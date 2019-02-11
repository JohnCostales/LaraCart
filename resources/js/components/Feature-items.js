import React, { Component } from "react";
import axios from 'axios'

export default class Left-sidebar extends Component {

    constructor()
    {
        super();
        this.state={
            products:[]
        }

    }

    compontDidMount(){
        axios.get('')
    }
    render() {
        return (
        <div className="col-sm-9 padding-right">
        <div className="features_items">
            
            <h2 className="title text-center">All Items</h2>
            <div className="col-sm-4">
                <div className="product-image-wrapper">
                    <div className="single-products">
                        <div className="productinfo text-center">
                            <img src="" alt="" />
                            <a href="#" className="btn btn-default add-to-cart"><i className="fa fa-shopping-cart"></i>Add
                                to cart</a>
                        </div>
                        <div className="product-overlay">
                            <div className="overlay-content">
                                <h2></h2>
                                <p></p>
                                <a href="#" className="btn btn-default add-to-cart"><i className="fa fa-shopping-cart"></i>Add
                                    to cart</a>
                            </div>
                        </div>
                    </div>
                    <div className="choose">
                        <ul className="nav nav-pills nav-justified">
                            <li><a href="#"><i className="fa fa-plus-square"></i>Add to wishlist</a></li>
                            <li><a href="#"><i className="fa fa-plus-square"></i>Add to compare</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        </div>)
    }
}
