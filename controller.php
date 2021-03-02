<?php
    function createTableHTML($planets){
            
        echo "<table>";
        echo "<tr><th>Nom</th><th>Taille</th><th>Distance du soleil</th><th>Masse</th><th>Inclinaison de l'axe</th></tr>";
        
        foreach ($planets as $planet => $tab) {
            $id = $tab['id'];
            $taille = $tab['taille'];
            $distance = $tab['distance'];
            $masse = $tab['masse'];
            $inclinaison = $tab['inclinaison'];
            
            echo "<tr>";
            echo "<td><a href='/controller.php/planete/$id'>$planet</a></td><td> $taille</td><td>$distance</td><td>$masse</td><td>$inclinaison</td>";
            echo "</tr>";
            
        }
    
        echo "</table>";
        
    }


    function giveJSONofAPlanet($id, $planets){
        $json = "Nothing was found.";
        foreach ($planets as $planet => $tab) {
            if($tab['id'] == $id){
                //c ok on return le tab.
                $json = [
                    'id' => $tab['id'],
                    'name' => $planet,
                    'taille' => $tab['taille'],
                    'distance' => $tab['distance'],
                    'masse' => $tab['masse'],
                    'inclinaison' => $tab['inclinaison']
                ];
                break;
            }
        }
    
        return json_encode($json, JSON_PRETTY_PRINT);
    
    
    }
    
    function giveJSONofAllPlanets($planets){
        $i = 0;
        if(isset($planets)){
            foreach ($planets as $planet => $tab) {
                //c ok on return le tab.
                $json[$i] = [
                    'id' => $tab['id'],
                    'name' => $planet,
                    'taille' => $tab['taille'],
                    'distance' => $tab['distance'],
                    'masse' => $tab['masse'],
                    'inclinaison' => $tab['inclinaison']
                ]; 
                $i++;       
           }
        }else{
            $json = "Nothing was found.";
        }
        
        
    
        return json_encode($json, JSON_PRETTY_PRINT);
    }

    function deleteAPlanet($planets, $id){
        $newPlanets = [];
        $i = 0;
        foreach ($planets as $planet => $tab) {
            if($tab['id'] != $id){
                //c ok on return le tab.
                $newPlanets[$planet] = [
                    'id' => $tab['id'],
                    'taille' => $tab['taille'],
                    'distance' => $tab['distance'],
                    'masse' => $tab['masse'],
                    'inclinaison' => $tab['inclinaison']
                ];
                
                $i++;
            }
        }
        
        return $newPlanets;
    }

    function addAPlanet($planets, $post){
        $newPlanets = $planets;
        $c = end($newPlanets)['id'] + 1;
        echo $c;

        if(
            (isset($post['name']) || array_key_exists('name', $post))
        && (isset($post['taille']) || array_key_exists('taille', $post))
        && (isset($post['distance']) || array_key_exists('distance', $post))
        && (isset($post['masse']) || array_key_exists('masse', $post))
        && (isset($post['inclinaison']) || array_key_exists('inclinaison', $post))
        
        )
        {
            $newPlanets[$post['name']] = [
            'id' => $c,
            'taille' => $post['taille'],
            'distance' => $post['distance'],
            'masse' => $post['masse'],
            'inclinaison' => $post['inclinaison']
        ];
        
        } else {
           echo "Not enough informations given..." ;
        }

        return $newPlanets;

    }
?>