<?php
/*
Plugin Name: smart User Slug Hider
Plugin URI: http://smartware.cc/wp-smart-user-slug-hider
Description: Hide usernames in author pages URLs to enhance security
Version: 1.0
Author: smartware.cc
Author URI: http://smartware.cc
License: GPL2
*/

/*  Copyright 2014  smartware.cc  (email : sw@smartware.cc)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

class Smart_User_Slug_Hider {
  
  public function __construct() {
    add_action( 'pre_get_posts', array( $this, 'alter_query' ), 99 );
    add_filter( 'author_link', array( $this, 'alter_link' ), 99, 3 );
  }

  private function encrypt( $id ) {
    return bin2hex( mcrypt_encrypt( MCRYPT_BLOWFISH, md5( $_SERVER['SERVER_ADDR'] . __FILE__ ), base_convert( $id, 10, 36 ), 'ecb' ) );
  }

  private function decrypt( $encid ) {
    return base_convert( mcrypt_decrypt( MCRYPT_BLOWFISH, md5( $_SERVER['SERVER_ADDR'] . __FILE__ ), pack('H*', $encid), 'ecb' ), 36, 10 );
  }

  function alter_query( $query ) {
    if ( $query->is_author() && $query->query_vars['author_name'] != '' ) {
      if ( ctype_xdigit( $query->query_vars['author_name'] ) ) {
        $user = get_user_by( 'id', $this->decrypt( $query->query_vars['author_name'] ) );
        if ( $user ) {
          $query->set( 'author_name', $user->user_nicename );
        } else {
          $query->is_404 = true;
          $query->is_author = false;
          $query->is_archive = false;
        }
      } else {
        $query->is_404 = true;
        $query->is_author = false;
        $query->is_archive = false;
      }
    }
    return;
  }

  function alter_link( $link, $author_id, $author_nicename ) {
    return str_replace ( '/' . $author_nicename, '/' . $this->encrypt( $author_id ), $link );
  }
}

$smart_user_slug_hider = new Smart_User_Slug_Hider();