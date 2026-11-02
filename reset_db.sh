#!/bin/sh

# 1. Exécution de la structure
mysql -h db -u user_ecole -puser_password_ecole prwb_2526_f05 < /database/01_prwb_2526_f05.sql

# 2. Exécution du dump (données)
mysql -h db -u user_ecole -puser_password_ecole prwb_2526_f05 < /database/prwb_2526_f05_dump.sql

echo "[$(date)] Base de données réinitialisée avec succès (Structure + Dump)."