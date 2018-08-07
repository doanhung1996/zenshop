<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models\Admin{
/**
 * App\Models\Admin\Customer
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Admin\Order[] $order
 * @mixin \Eloquent
 * @property int $id
 * @property string $fullname
 * @property string $gender
 * @property string $email
 * @property int $phone
 * @property string $address
 * @property string $note
 * @property string $status
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Customer whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Customer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Customer whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Customer whereFullname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Customer whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Customer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Customer whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Customer wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Customer whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Customer whereUpdatedAt($value)
 * @property string $province
 * @property string $city
 * @property int|null $user_id
 * @property-read \App\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Customer whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Customer whereProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Customer whereUserId($value)
 */
	class Customer extends \Eloquent {}
}

namespace App\Models\Admin{
/**
 * App\Models\Admin\Delivery
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $provincial
 * @property string $city
 * @property string $address
 * @property string $email
 * @property int $delivery
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Delivery whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Delivery whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Delivery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Delivery whereDelivery($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Delivery whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Delivery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Delivery whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Delivery wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Delivery whereProvincial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Delivery whereUpdatedAt($value)
 */
	class Delivery extends \Eloquent {}
}

namespace App\Models\Admin{
/**
 * App\Models\Admin\Email_customer
 *
 * @property int $id
 * @property string $email
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Email_customer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Email_customer whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Email_customer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Email_customer whereUpdatedAt($value)
 */
	class Email_customer extends \Eloquent {}
}

namespace App\Models\Admin{
/**
 * App\Models\Admin\Menu_item
 *
 * @property-read \App\Models\Admin\Menu_type $menu_type
 * @mixin \Eloquent
 * @property int $id
 * @property string $title
 * @property string $type_connect
 * @property string $slug
 * @property int $connect_id
 * @property int $parent_id
 * @property int $menu_type_id
 * @property string $menu_type_title
 * @property int $menu_order
 * @property string $status
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Menu_item whereConnectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Menu_item whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Menu_item whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Menu_item whereMenuOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Menu_item whereMenuTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Menu_item whereMenuTypeTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Menu_item whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Menu_item whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Menu_item whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Menu_item whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Menu_item whereTypeConnect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Menu_item whereUpdatedAt($value)
 * @property string $type
 * @property int $order
 * @property int $user_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Admin\Menu_item[] $childs
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Menu_item whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Menu_item whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Menu_item whereUserId($value)
 */
	class Menu_item extends \Eloquent {}
}

namespace App\Models\Admin{
/**
 * App\Models\Admin\Menu_type
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Admin\Menu_item[] $menu_item
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $status
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Menu_type whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Menu_type whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Menu_type whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Menu_type whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Menu_type whereUpdatedAt($value)
 * @property int $user_id
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Menu_type whereUserId($value)
 */
	class Menu_type extends \Eloquent {}
}

namespace App\Models\Admin{
/**
 * App\Models\Admin\Method_delivery
 *
 * @property int $id
 * @property string $title
 * @property string $date_info
 * @property int $date
 * @property int $price
 * @property int $user_id
 * @property string $status
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Method_delivery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Method_delivery whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Method_delivery whereDateInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Method_delivery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Method_delivery wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Method_delivery whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Method_delivery whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Method_delivery whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Method_delivery whereUserId($value)
 */
	class Method_delivery extends \Eloquent {}
}

namespace App\Models\Admin{
/**
 * App\Models\Admin\Order
 *
 * @property-read \App\Models\Admin\Customer $customer
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Admin\Order_detail[] $order_detail
 * @mixin \Eloquent
 * @property int $id
 * @property int $customer_id
 * @property string $date_order
 * @property float $total
 * @property string $note
 * @property string $payment
 * @property string $status
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order whereDateOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order wherePayment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order whereUpdatedAt($value)
 * @property string $fullname
 * @property string $email
 * @property string $phone
 * @property string $province
 * @property string $city
 * @property string $address
 * @property string $pay
 * @property string $delivery
 * @property string $order_code
 * @property int $total_qty
 * @property int $total_sale
 * @property string $order_date
 * @property string $date_transport
 * @property int|null $user_id
 * @property-read \App\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order whereDateTransport($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order whereDelivery($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order whereFullname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order whereOrderCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order whereOrderDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order wherePay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order whereProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order whereTotalQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order whereTotalSale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order whereUserId($value)
 */
	class Order extends \Eloquent {}
}

namespace App\Models\Admin{
/**
 * App\Models\Admin\Order_detail
 *
 * @property-read \App\Models\Admin\Order $order
 * @property-read \App\Models\Admin\Product $product
 * @mixin \Eloquent
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property int $quantity
 * @property float $price
 * @property string $status
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order_detail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order_detail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order_detail whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order_detail wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order_detail whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order_detail whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order_detail whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order_detail whereUpdatedAt($value)
 * @property string $name
 * @property int $subtotal
 * @property int $profit
 * @property string $order_code
 * @property string $image
 * @property int|null $user_id
 * @property-read \App\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order_detail whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order_detail whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order_detail whereOrderCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order_detail whereProfit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order_detail whereSubtotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order_detail whereUserId($value)
 */
	class Order_detail extends \Eloquent {}
}

namespace App\Models\Admin{
/**
 * App\Models\Admin\Page
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $title
 * @property string $content_page
 * @property string $slug
 * @property string $status
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Page whereContentPage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Page whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Page whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Page whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Page whereUpdatedAt($value)
 * @property int $user_id
 * @property-read \App\User $creator
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Page whereUserId($value)
 */
	class Page extends \Eloquent {}
}

namespace App\Models\Admin{
/**
 * App\Models\Admin\Post
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $image
 * @property string $content
 * @property int $post_cat_id
 * @property string $status
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Post whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Post whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Post whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Post wherePostCatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Post whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Post whereUpdatedAt($value)
 * @property string $title_seal
 * @property int $user_id
 * @property string $slug
 * @property int $category_id
 * @property int $viewer
 * @property-read \App\Models\Admin\Post_cat $category
 * @property-read \App\Models\Admin\Post_cat $post_cat
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Post whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Post whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Post whereTitleSeal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Post whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Post whereViewer($value)
 */
	class Post extends \Eloquent {}
}

namespace App\Models\Admin{
/**
 * App\Models\Admin\Post_cat
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property int $parent_id
 * @property int $user_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Admin\Post_cat[] $childs
 * @property-read \App\Models\Admin\Post_cat $parent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Admin\Post[] $post
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Post_cat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Post_cat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Post_cat whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Post_cat whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Post_cat whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Post_cat whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Post_cat whereUserId($value)
 */
	class Post_cat extends \Eloquent {}
}

namespace App\Models\Admin{
/**
 * App\Models\Admin\Product
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Admin\Order_detail[] $order_detail
 * @property-read \App\Models\Admin\Product_cat $product_cat
 * @mixin \Eloquent
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $image
 * @property float $price
 * @property string $detail
 * @property int $product_cat_id
 * @property string $status
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product whereDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product whereProductCatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product whereUpdatedAt($value)
 * @property string $product_name
 * @property string $product_name_seal
 * @property string|null $images
 * @property string|null $images_s
 * @property string $link_video
 * @property int $product_discount
 * @property string $product_code
 * @property int $user_id
 * @property string $slug
 * @property int $product_purchase
 * @property int $category_id
 * @property int $viewer
 * @property int $cart
 * @property-read \App\Models\Admin\Product_cat $category
 * @property-read mixed $price_sale
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product whereCart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product whereImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product whereImagesS($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product whereLinkVideo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product whereProductCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product whereProductDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product whereProductName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product whereProductNameSeal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product whereProductPurchase($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product whereViewer($value)
 */
	class Product extends \Eloquent {}
}

namespace App\Models\Admin{
/**
 * App\Models\Admin\Product_cat
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Admin\Product[] $product
 * @mixin \Eloquent
 * @property int $id
 * @property string $title
 * @property int $parent_id
 * @property string $status
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product_cat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product_cat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product_cat whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product_cat whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product_cat whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product_cat whereUpdatedAt($value)
 * @property string $slug
 * @property int $user_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Admin\Product[] $category_product
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Admin\Product_cat[] $childs
 * @property-read \App\Models\Admin\Product_cat $parent
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product_cat whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product_cat whereUserId($value)
 */
	class Product_cat extends \Eloquent {}
}

namespace App\Models\Admin{
/**
 * App\Models\Admin\Slider
 *
 * @property int $id
 * @property string $name
 * @property string $title
 * @property int $price
 * @property string $link
 * @property string $image
 * @property string $background
 * @property string $status
 * @property int $user_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Slider whereBackground($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Slider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Slider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Slider whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Slider whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Slider whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Slider wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Slider whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Slider whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Slider whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Slider whereUserId($value)
 */
	class Slider extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-write mixed $password
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $verified
 * @property string $account
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereAccount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereVerified($value)
 * @property string|null $phone
 * @property string|null $address
 * @property string|null $gender
 * @property string|null $image
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Admin\Page[] $pages
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePhone($value)
 */
	class User extends \Eloquent {}
}

