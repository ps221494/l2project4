   M S B A M L   `   `   `  ����@  <Login, Version=1.0.0.0, Culture=neutral, PublicKeyToken=nullclr-namespace:LoginLogin  5   	   +clr-namespace:Login.ModelsLogin.Models  5   	       Login.NewPizzaWin   5   	   R NWindowsBase, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35W SPresentationCore, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35\ XPresentationFramework, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35D 9http://schemas.microsoft.com/winfx/2006/xaml/presentation    5   	   R NSystem.Xaml, Version=4.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089:x,http://schemas.microsoft.com/winfx/2006/xaml     5   	   @d2http://schemas.microsoft.com/expression/blend/2008     5   	   Jmc;http://schemas.openxmlformats.org/markup-compatibility/2006     5   	   %localclr-namespace:Login     5   	   -modelsclr-namespace:Login.Models     5   	     � Title$  NewPizzaWin��5	   	   $	��760��6   $	��470��6*    � WindowStartupLocation$ CenterScreen=�66   .��5
      �  � ColumnDefinitions 5   
   �� 5      $��50 �6   �� 5      $��1* �6   �� 5      $��50 �6    � RowDefinitions 5   
   �� 5      $��10 �6   �� 5      $
��0.5* �6   �� 5      $��3* �6   �� 5      $
��0.5* �6   �� 5      $��10 �6   .+�5   
   �� $��2��6   $��1��6"    � DataContext$  ��62   .+�5      ��  �� Orientation$ 
Horizontal=�6   $��60��62   .+�5      �� $��
Pizza Naam��6   $��25(�6-   �� 5      $	��210��6   $��40��6'   $�� ��63   5      �� 5      $ 
Horizontal=�6   .+�5      �� $��Description��6   $��25(�6.   5       �� 5!      $ 
Horizontal=�6   .+�5"      �� -   5        $��tbDescription��5"   3   $	��150��6   $	��350��6'   63   5#      �� 5$      $ 
Horizontal=�6   .+�5%      �� $��Ingredienten��6   $��25(�6/   $	��163��6=   5&      �� 5'      $��0,10,0,0q�6   .+�5(      �� -   5         ��Name$ cmbIngredient1��5(   '   $��35��6    �� DisplayMemberPath$
 Name��6p    �� SelectedItem 6?   �� 	 �� Path$	 SelectedIngredient�6p   5)      �� 5*      $��0,10,0,0q�6   .+�5+      �� -   5        $ cmbIngredient2��5+   '   $��35��6   $
 Name��6p    6?   �� $	 SelectedIngredient�6p   5,      �� 5-      $��0,10,0,0q�6   .+�5.      �� -   5        $ cmbIngredient3��5.   '   $��35��6   $
 Name��6p    6?   �� $	 SelectedIngredient�6p   5/      �� 50      $��0,10,0,0q�6   .+�51      �� -   5        $ cmbIngredient4��51   '   $��35��6   $
 Name��6p    6?   �� $	 SelectedIngredient�6p   52      �� 53      $��0,10,0,0q�6   .+�54      �� -   5        $ cmbIngredient5��54   '   $��35��6   $
 Name��6p    6?   �� $	 SelectedIngredient�6p   55      57      �� 5:   
   $��Create Costumer��6   $��1��6*   $��1��67   $��Center=�6G   $��Center=�6b   �� 5;   
   -   5        $��1��5;      $��3��6!   $��	Toevoegen��6.   
�������$��25(�6U   
��� � �$��90��6v   $	��Top=�6�   
 � 	Resources
 5<       �� 
TargetType �� Property �� Value��%_   '��       �� 5=      " ��6   .�5>      ��  �@��CornerRadius$ 15��65   5?      5@      5A      5C      5D      