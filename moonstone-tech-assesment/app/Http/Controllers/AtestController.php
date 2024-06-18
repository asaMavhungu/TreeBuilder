<?php


namespace App\Http\Controllers;

use App\Models\Atest;
use Illuminate\Http\Request;

class AtestController extends Controller
{
    public function index(Request $request)
    {
        $items = Atest::all();

        $query = $request->input("query");

        if($query)
        {
            $tree = $this->filterTree( $items, $query );
            dump(gettype($tree));
            $tree = $this->buildTree($tree);

            dump(gettype($tree));
            return view('atest.index', compact('tree')); 
        }
        
        $tree = $this->buildTree($items);

        // pass the tree structure to the 'atest.index' view
        // the tree structure will be refered to as 'tree' in the view
        return view('atest.index', compact('tree')); 
    }

    private function filterTree($items, $query)
    {

        // filter out all the items that have the query as a substring
        $filteredItems = $items->filter(function ($item) use ($query) {
            return stripos($item->name, $query) !== false;
        });

        $tree = collect();
        // keep track of nodes already added to the tree
        $visitetedItems = collect();

        foreach ($filteredItems as $item) 
        {
            $currentItem = $item;

            if (!$visitetedItems->contains($item->id))
                $tree->push($currentItem);


            while ($currentItem)
            {

                // get this items parent
                $parent = Atest::where('id', $currentItem->pef_item_id)->first();

                if ($parent)
                {
                    if (!$visitetedItems->contains($parent->id))
                    {
                        $tree->push($parent); // push this parent to the tree
                        $visitetedItems->push($parent->id); // mark parent as visited
                    }
                    $currentItem = $parent; // now we move to the parents of current parent
                }
                else
                {
                    if (!$visitetedItems->contains($currentItem->id))
                        $tree->push($currentItem); // no parent means this is a root node
                    break; // move to the next filteredIten
                }
            }

        }
        return $tree;
    }

    private function buildTree($items)
    {
        // create a collection of arrays
        // each element in the array uses the 'pef_item_id' as a key
        $groupedItems = $items->groupBy('pef_item_id');
        dump(gettype($groupedItems));

        // get root items
        $rootItems = $groupedItems->get(null);
        dump(gettype($rootItems));

        // ensure $rootItens is not null
        $rootItems = $rootItems ?: collect([]);

        /**
         * iterates through each item in the $items collection.
         * checks if there are items ($grouped->has($item->id)) that have 
         * the current item's id as their pef_item_id.
         * if true, assigns these items as children to the current $item.
         */
        foreach ($items as $item) 
        {
            // chech if the collection has a subarray associated with 
            // this items id
            if ($groupedItems->has($item->id))
            {
                $item->children = $groupedItems->get($item->id);
            }
        }
        // Return the Root items
        return $rootItems; 
    }
}