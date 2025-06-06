<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\TblClient;
use App\Models\TrkMenu;

class IdentifyClient
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $host = 'https://'.$request->getHost().'/';
        
        $client = TblClient::where('client_website_url', $host)->first();

        if (!$client) {
            abort(403, 'Client not found');
        }

        // Register globally in the container
        app()->instance('client', $client);

        // Build nav menu
        $menus = TrkMenu::with('submenu')
            ->where('vendor_id', $client->id)
            ->where('is_active', 1)
            ->orderBy('display_order', 'ASC')
            ->get()
            ->toArray();

        foreach ($menus as &$menu) {
            $menu['submenu'] = $this->buildMenuTree($menu['submenu']);
        }
        
        // echo "<pre>";
        // print_r($menu);exit;
        // Share with all views
        view()->share([
            'client' => $client,
            'navMenu' => $menus,
        ]);

        return $next($request);
    }

    private function buildMenuTree(array $items, $parentId = null): array
    {
        $branch = [];

        foreach ($items as $item) {
            if ($item['parent_id'] == $parentId) {
                $children = $this->buildMenuTree($items, $item['submenu_id']);
                $item['children'] = $children ?: [];
                $branch[] = $item;
            }
        }

        return $branch;
    }
}