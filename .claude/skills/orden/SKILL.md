---
name: orden
description: Recuerda el orden correcto para guardar cambios y subirlos a Git en este proyecto.
disable-model-invocation: true
---

Responde en español. Muestra al usuario este orden, tal cual, en un bloque de código:

```sh
git status                      # 1. ¿rama correcta? ¿qué cambió?
git pull                        # 2. traer lo último
git add .                       # 3. preparar
git commit -m "mensaje claro"   # 4. guardar
git push                        # 5. subir
```

Después, corre `git status -sb` y dile en una o dos líneas:
- en qué rama está (debe ser `rediseno-V2`; si es `Rolo` u otra, adviértele que se detenga, porque `Rolo` no se toca),
- si hay cambios sin commit o commits sin subir.

Recuérdale en una línea que antes del commit conviene correr `npm run build` y `php artisan test`.

No hagas commit ni push por tu cuenta: solo recuerda el orden. Si el usuario pide que lo hagas, pregúntale primero el mensaje del commit.
