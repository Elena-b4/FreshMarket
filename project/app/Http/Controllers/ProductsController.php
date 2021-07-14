<?php

namespace App\Http\Controllers;


use App\Helpers\CartWishlistHelper;
use App\Http\Requests\Products\ProductFilterRequest;
use App\Http\Requests\Products\ProductSearchRequest;
use App\Http\Requests\Products\ProductUpdateRequest;
use App\Models\Product;
use App\Models\User;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\ManufactureRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Services\FilterServices\Contracts\FilterServiceInterface;

class ProductsController extends Controller
{
    private $productRepository;
    private $categoryRepository;
    private $manufactureRepository;
    private $filterService;

    const CART_PATH = '/product-cart';
    const WISHLIST_PATH = '/add-to-wishlists';

    public function __construct(FilterServiceInterface $filterService, ProductRepositoryInterface $productRepository, CategoryRepositoryInterface $categoryRepository, ManufactureRepositoryInterface $manufactureRepository)
    {
        $this->filterService = $filterService;
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->manufactureRepository = $manufactureRepository;
    }

    public function index()
    {
        return view('index');
    }

    public function productShow(Product $product)
    {
        $products = $this->productRepository->getAllProducts();
        return view('Products.product-detail', compact('product', 'products'));
    }

    public function checkout(User $user)
    {
        return view('Products.product-checkout', compact('user'));
    }

    public function showWishlists()
    {
        return view('Account.wishlists');
    }

    public function products(ProductFilterRequest $request)
    {
        $data = $request->validated();
        $categories = $this->categoryRepository->getAllCategories();
        $manufactures = $this->manufactureRepository->getAllManufactures();
        if ($data != []) {
            $products = $this->filterService->filter($data);
        } else {
            $products = $this->productRepository->getAllProductsPaginate();
        }
        return view('Products.product-grid', compact('products', 'categories', 'manufactures'));
    }

    public function productCart()
    {
        return view('Products.product-cart');
    }

    public function deleteFromCart($id): \Illuminate\Http\RedirectResponse
    {
        session()->forget(self::CART_PATH . '.'. $id);
        return redirect()->back();
    }

    public function search(ProductSearchRequest $request)
    {
        $categories = $this->categoryRepository->getAllCategories();
        $manufactures = $this->manufactureRepository->getAllManufactures();
        $data = $request->validated();
        $products = $this->filterService->search($data);
        return view('Products.product-grid', compact('categories', 'manufactures', 'products'));
    }

    public function addToCart($id): \Illuminate\Http\RedirectResponse
    {
        $product = $this->productRepository->getById($id);
        if (!$product) {
            abort(404);
        }
        $cart = session()->get(self::CART_PATH);
        CartWishlistHelper::addProductToCartOrWishlist($cart, $product, $id, self::CART_PATH);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function updateCart(ProductUpdateRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validated();
        session()->forget(self::CART_PATH . $id);
        $product = $this->productRepository->getById($id);
        $cart = session()->get(self::CART_PATH);
        CartWishlistHelper::updateProductInCart($data, $cart, $id, $product);
        return redirect()->route('products.cart');
    }

    public function deleteFromWishlist($id): \Illuminate\Http\RedirectResponse
    {
        session()->forget(self::WISHLIST_PATH . '.'. $id);
        return redirect()->back();
    }

    public function addToWishlists($id): \Illuminate\Http\RedirectResponse
    {
        $product = $this->productRepository->getById($id);
        if (!$product) {
            abort(404);
        }
        $wishlist = session()->get(self::WISHLIST_PATH);
        CartWishlistHelper::addProductToCartOrWishlist($wishlist, $product, $id, self::WISHLIST_PATH);
        return redirect()->back()->with('success', 'Product added to wishlist successfully!');
    }

}
