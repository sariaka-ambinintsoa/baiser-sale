ARTISTS:artist_id, name, role
contain, 1N ARTISTS, 1N GROUPS
GROUPS: group_id,name, description, date_created_group 
belong, 11 GROUPS, 1N CONCERT
CONCERT:concert_id, description, date_concert, pictures, tag, prix, number_of_place  