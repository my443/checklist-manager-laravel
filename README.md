# Checklist Manager

## Summary

This app allows you to create checklists from which you can complete tasks. 

Useful for repetitive tasks that you need a guide for. 

## Technical Detail 

1. Once you start the app you will have to go to [http://localhost:8000/masterlist](http://localhost:8000/masterlist) as the starting point. 
2. The database for this item was set as a PostgreSQL database. It should work with all other databases if you change the .env settings. 


<div align="center">
Create checklists that you will use.<br>
<img src="https://raw.githubusercontent.com/my443/checklist-manager-laravel/master/img/Screenshot1.png" alt="Screenshot #1"><br>
Add or remove items from your checklists.<br>
<img src="https://raw.githubusercontent.com/my443/checklist-manager-laravel/master/img/Screenshot2.png" alt="Screenshot #2"><br>
Complete items on the checklist.<br>
<img src="https://raw.githubusercontent.com/my443/checklist-manager-laravel/master/img/Screenshot3.png" alt="Screenshot #3"><br>

</div>


## TODO
**This app can use a lot of polish yet.**
1. Put the values in a form when it doesn't save because of validation issues. 
2. Be able to see which checklists are in progress
3. When a checklist is complete, it needs to have a completed date. 
4. Filter on checklists (active/ inactive)
5. When checklist items are marked 'Inactive' they shouldn't appear on the list anymore. (Except if they have already been completed.)


## Known issues
1. If you use the migrations included you may have to make some of the feilds non-null in order to make it work. (The migrations weren't updated with all edits to the database.)
