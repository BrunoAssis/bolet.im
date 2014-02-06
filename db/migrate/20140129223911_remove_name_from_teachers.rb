class RemoveNameFromTeachers < ActiveRecord::Migration
  def change
    remove_column :teachers, :name, :string
  end
end
