# Git

Stylesheet, Tips&Tricks

## Run merge conflict resolution tools to resolve merge conflicts

```
$: git mergetool
```

##  How to switch back to 'master' with git?

```
$: git checkout master
```

##  How to create tag and pushing it to repository?

```
$: git tag 0.1.2
$: git push origin master --tags
```

## Creating new branch

```
$: git checkout -b new-branch-name
```

## Checkout remote branch (with refreshing list of remote branches)

```
$: git fetch
$: git checkout test
```

## Best (and safest) way to merge a git branch into master

```
$: git checkout test
$: git pull origin test
$: git checkout master
$: git pull origin master
$: git merge test
$: git push origin master
```
## Fast way to merge other branch into current branch

```
$: git checkout mybranch
$: git pull origin maseter
```

## Reset not commited changes

```
$: git reset --hard HEAD
```

## Revert changes from file

```
$: git checkout file.ext
```

## Add an empty directory to a Git repository

Create a .gitignore file inside that directory.

```
# Ignore everything in this directory
*
# Except this file
!.gitignore
```

## Undo a commit
```
$: git commit -m "Something really bad"
$: git reset --soft HEAD~
```

## The tree-like view of commits

```
$: git log --oneline --decorate --all --graph --abbrev-commit
```

## Preety Git Log

```
$: git log --graph --pretty=format:'%Cred%h%Creset -%C(yellow)%d%Creset %s %Cgreen(%cr) %C(bold blue)<%an>%Creset' --abbrev-commit
```

## "Author" vs "Committer"

- *author* - is the one who created the content
- *commiter* - is the one who committed changes/patch

## "Merge" vs "Rebase"

- merge - tworzy nowy commit "merge commit" który scala dwie gałęzie, nieliniowa struktura zmian, zastosowanie
  - wdrażanie "feature branche" do "develop" / "master"
- rebase - liniowa struktura zmian, nie widać momentu kiedy nastąpił "rebase", zastosowanie:
  - gałęzie współdzielone pomiędzy programistami (bez kolejnych rozgałęzień, np. ktoś inny zrobi "hotfixes" na gałęzi "feature branch")
  - synchronizacja "develop" / "master" do "feature branch" (jeżeli nasz "feature branch" pochodzi bezpośrednio z "develop" / "master")

## Fast-Forward

```
$: git merge --ff topic
```

When the merge resolves as a fast-forward, only update the branch pointer, without creating a merge commit. (linear history)

```
$: git merge --no-ff topic
```

Create a merge commit even when the merge resolves as a fast-forward. (explicit branches)

## GitFlow

![git-flow.png](git-flow.png)
