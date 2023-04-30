import React, { Component } from 'react';
import '../styles/header.css'

class Header extends Component {
    render() {
    return(
        <div className="header">
            <header className="header">
                <div className="logo">
                    <img src={#} className="app-logo" alt="logo" />
                </div>
                <div className="navigations">
                    <nav>
                        <ul>
                            <li><a className="home" href="" target="_blank">Home</a></li>
                            <li><a className="home" href="" target="_blank">Categories</a></li>
                            <li><a className="home" href="" target="_blank">About</a></li>
                            <li><a className="home" href="" target="_blank">Faq</a></li>
                        </ul>
                    </nav>
                </div>
            </header>
        </div>
    );
    }
}

export default Header;