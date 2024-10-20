<?php

namespace App\Tools;

class ImagePrompts
{
    public function themes()
    {
        return [
            [
                "value" => 'ghosts',
                "label" => 'Fondo Fantasmas',
                "prompt" => 'e_gen_background_replace:prompt_A spooky background with floating ghosts kawaii',
                "image" => '/images/formats/theme-ghosts.webp'
            ],
            [
                "value" => 'zombies',
                "label" => 'Fondo Zombies',
                "prompt" => 'e_gen_background_replace:prompt_A dark background with zombies creeping out of the ground kawaii',
                "image" => '/images/formats/theme-zombie.webp'
            ],
            [
                "value" => 'pumpkins',
                "label" => 'Fondo Calabazas',
                "prompt" => 'e_gen_background_replace:prompt_A Halloween background with glowing jack-o\'-lantern pumpkins kawaii',
                "image" => '/images/formats/theme-pumpkins.webp'
            ],
            [
                "value" => 'witches',
                "label" => 'Fondo Brujas',
                "prompt" => 'e_gen_background_replace:prompt_A magical background with flying witches on broomsticks kawaii',
                "image" => '/images/formats/theme-witches.webp'
            ],
            [
                "value" => 'bats',
                "label" => 'Fondo Murciélagos',
                "prompt" => 'e_gen_background_replace:prompt_A spooky night sky filled with flying bats kawaii',
                "image" => '/images/formats/theme-bats.webp'
            ],
            [
                "value" => 'spiders',
                "label" => 'Fondo Arañas',
                "prompt" => 'e_gen_background_replace:prompt_A creepy background with spiders crawling over webs kawaii',
                "image" => '/images/formats/theme-spider.webp'
            ],
            [
                "value" => 'skulls',
                "label" => 'Fondo Calaveras',
                "prompt" => 'e_gen_background_replace:prompt_A chilling background with scattered skulls kawaii',
                "image" => '/images/formats/theme-calavera.webp'
            ],
            [
                "value" => 'vampires',
                "label" => 'Fondo Vampiros',
                "prompt" => 'e_gen_background_replace:prompt_A dark gothic background with looming vampires kawaii',
                "image" => '/images/formats/themes-vampiros.webp'
            ],
            [
                "value" => 'werewolves',
                "label" => 'Fondo Hombres Lobo',
                "prompt" => 'e_gen_background_replace:prompt_A misty forest background with howling werewolves kawaii',
                "image" => '/images/formats/theme-lobo.webp'
            ],
            // objects
            [
                "value" => 'cloth-ghost',
                "label" => 'Atuendo Fantasma',
                "prompt" => 'e_gen_replace:from_cloth%20or%20costume;;to_a%20ghost%20costume%20with%20spooky%20details kawaii',
                "image" => '/images/formats/cloth-ghost.webp'
            ],
            [
                "value" => 'cloth-witch',
                "label" => 'Atuendo de Bruja',
                "prompt" => 'e_gen_replace:from_cloth%20or%20costume;;to_a%20witch%20costume%20with%20a%20pointed%20hat kawaii',
                "image" => '/images/formats/cloth-witch.webp'
            ],
            [
                "value" => 'cloth-zombie',
                "label" => 'Atuendo de Zombie',
                "prompt" => 'e_gen_replace:from_cloth%20or%20costume;;to_a%20zombie%20costume%20with%20tattered%20clothes kawaii',
                "image" => '/images/formats/cloth-zombie.webp'
            ],
            [
                "value" => 'cloth-vampire',
                "label" => 'Atuendo de Vampiro',
                "prompt" => 'e_gen_replace:from_cloth%20or%20costume;;to_a%20vampire%20costume%20with%20a%20cape kawaii',
                "image" => '/images/formats/cloth-vampire.webp'
            ],
            [
                "value" => 'cloth-werewolf',
                "label" => 'Atuendo de Hombre Lobo',
                "prompt" => 'e_gen_replace:from_cloth%20or%20costume;;to_a%20werewolf%20costume%20with%20fur%20details kawaii',
                "image" => '/images/formats/cloth-werewolf.webp'
            ],
            [
                "value" => 'cloth-pumpkin',
                "label" => 'Atuendo de Calabaza',
                "prompt" => 'e_gen_replace:from_cloth%20or%20costume;;to_a%20pumpkin%20costume%20with%20a%20carved%20face kawaii',
                "image" => '/images/formats/cloth-pumpkin.webp'
            ],
            [
                "value" => 'cloth-bat',
                "label" => 'Atuendo de Murciélago',
                "prompt" => 'e_gen_replace:from_cloth%20or%20costume;;to_a%20bat%20costume%20with%20wings kawaii',
                "image" => '/images/formats/cloth-bat.webp'
            ],
            [
                "value" => 'cloth-spider',
                "label" => 'Atuendo de Araña',
                "prompt" => 'e_gen_replace:from_cloth%20or%20costume;;to_a%20spider%20costume%20with%20multiple%20legs kawaii',
                "image" => '/images/formats/cloth-spider.webp'
            ],
            [
                "value" => 'cloth-skull',
                "label" => 'Atuendo de Calavera',
                "prompt" => 'e_gen_replace:from_cloth%20or%20costume;;to_a%20skull%20costume%20with%20bone%20details kawaii',
                "image" => '/images/formats/cloth-skull.webp'
            ],
            [
                "value" => 'crying-halloween-character',
                "label" => 'Personaje Llorón Halloween',
                "prompt" => 'e_gen_replace:from_cloth%20or%20costume%20and%20face;to_a%20crying%20character%20in%20a%20Halloween%20costume%20with%20tears%20and%20a%20sad%20expression%20kawaii',
                "image" => '/images/formats/crying-halloween-character.webp'
            ],
        ];
    }

    public function objectThemes()
    {
        return [

            [
                "value" => 'cloth-ghost',
                "label" => 'Atuendo Fantasma',
                "prompt" => 'e_gen_replace:from_cloth;to_a%20ghost%20costume%20with%20spooky%20details',
                "image" => '/images/formats/cloth-ghost.webp'
            ],
            [
                "value" => 'cloth-witch',
                "label" => 'Atuendo de Bruja',
                "prompt" => 'e_gen_replace:from_cloth;to_a%20witch%20costume%20with%20a%20pointed%20hat',
                "image" => '/images/formats/cloth-witch.webp'
            ],
            [
                "value" => 'cloth-zombie',
                "label" => 'Atuendo de Zombie',
                "prompt" => 'e_gen_replace:from_cloth;to_a%20zombie%20costume%20with%20tattered%20clothes',
                "image" => '/images/formats/cloth-zombie.webp'
            ],
            [
                "value" => 'cloth-vampire',
                "label" => 'Atuendo de Vampiro',
                "prompt" => 'e_gen_replace:from_cloth;to_a%20vampire%20costume%20with%20a%20cape',
                "image" => '/images/formats/cloth-vampire.webp'
            ],
            [
                "value" => 'cloth-werewolf',
                "label" => 'Atuendo de Hombre Lobo',
                "prompt" => 'e_gen_replace:from_cloth;to_a%20werewolf%20costume%20with%20fur%20details',
                "image" => '/images/formats/cloth-werewolf.webp'
            ],
            [
                "value" => 'cloth-pumpkin',
                "label" => 'Atuendo de Calabaza',
                "prompt" => 'e_gen_replace:from_cloth;to_a%20pumpkin%20costume%20with%20a%20carved%20face',
                "image" => '/images/formats/cloth-pumpkin.webp'
            ],
            [
                "value" => 'cloth-bat',
                "label" => 'Atuendo de Murciélago',
                "prompt" => 'e_gen_replace:from_cloth;to_a%20bat%20costume%20with%20wings',
                "image" => '/images/formats/cloth-bat.webp'
            ],
            [
                "value" => 'cloth-spider',
                "label" => 'Atuendo de Araña',
                "prompt" => 'e_gen_replace:from_cloth;to_a%20spider%20costume%20with%20multiple%20legs',
                "image" => '/images/formats/cloth-spider.webp'
            ],
            [
                "value" => 'cloth-skull',
                "label" => 'Atuendo de Calavera',
                "prompt" => 'e_gen_replace:from_cloth;to_a%20skull%20costume%20with%20bone%20details',
                "image" => '/images/formats/cloth-skull.webp'
            ],
            [
                "value" => 'crying-halloween-character',
                "label" => 'Personaje Llorón Halloween',
                "prompt" => 'e_gen_replace:from_happy;to_a%20crying%20character%20in%20a%20Halloween%20costume%20with%20tears%20and%20a%20sad%20expression',
                "image" => '/images/formats/crying-halloween-character.webp'
            ],
            [
                "value" => 'cloth-none',
                "label" => 'Ninguno',
                "prompt" => '',
                "image" => '/images/formats/none-selected.webp'
            ],


        ];
    }


    public function formats()
    {
        return [
            [
                "value" => 'none-format',
                "label" => 'Ninguno',
                "prompt" => '',
                "image" => '/images/formats/none-selected.webp'
            ],
            [
                "value" => 'vertical',
                "label" => 'Vertical',
                "prompt" => 'c_fill,g_auto,ar_9:16',
                "image" => '/images/formats/formato-vertical.webp'
            ],
            [
                "value" => 'horizontal',
                "label" => 'Horizontal',
                "prompt" => 'c_fill,g_auto,ar_16:9',
                "image" => '/images/formats/formato-horizontal.webp'
            ],
            [
                "value" => 'square',
                "label" => 'Cuadrado',
                "prompt" => 'c_fill,g_auto,ar_1:1',
                "image" => '/images/formats/formato-cuadrado.webp'
            ],
            [
                "value" => 'vertical-34',
                "label" => 'Vertical 3:4',
                "prompt" => 'c_fill,g_auto,ar_3:4',
                "image" => '/images/formats/formato-3-4.webp'
            ],
        ];
    }

    public function filters()
    {
        return [
            [
                "value" => 'none-filter',
                "label" => 'Ninguno',
                "prompt" => '',
                "image" => '/images/formats/none-selected.webp'
            ],
            [
                "value" => 'filter-grayscale',
                "label" => 'Blanco y Negro',
                "prompt" => 'e_grayscale',
                "image" => '/images/formats/filtro-grayscale.webp'
            ],
            [
                "value" => 'filter-sepia',
                "label" => 'Filtro Sepia',
                "prompt" => 'e_sepia',
                "image" => '/images/formats/filtro-sepia.webp'
            ],
            [
                "value" => 'filter-glow',
                "label" => 'Filtro fantasmal',
                "prompt" => 'e_vignette:100,e_brightness:30',
                "image" => '/images/formats/filtro-glow.webp'
            ],
        ];
    }

    // function para obtener un theme mediante su value
    public function getTheme($value)
    {
        $all_items = $this->themes();
        // buscar por value
        foreach ($all_items as $item) {
            if ($item['value'] === $value) {
                return $item;
            }
        }
        return null;
    }

    // obtener los objects themes
    public function getObjectTheme($value)
    {
        $all_items = $this->objectThemes();
        // buscar por value
        foreach ($all_items as $item) {
            if ($item['value'] === $value) {
                return $item;
            }
        }
        return null;
    }

    // función para obtener un filtro mediante su value
    public function getFormat($value)
    {
        $all_items = $this->formats();
        // buscar por value
        foreach ($all_items as $item) {
            if ($item['value'] === $value) {
                return $item;
            }
        }
        return null;
    }
    // función para obtener un filtro mediante su value
    public function getFilter($value)
    {
        $all_items = $this->filters();
        // buscar por value
        foreach ($all_items as $item) {
            if ($item['value'] === $value) {
                return $item;
            }
        }
        return null;

    }


}
