class RemoveSchoolFromGrades < ActiveRecord::Migration
  def change
    remove_reference :grades, :school, index: true
  end
end
